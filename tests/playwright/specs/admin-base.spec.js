import { expect, test } from '@wordpress/e2e-test-utils-playwright';
/**
 * External dependencies
 */
import path from 'path';

test.describe( 'Check block positioning', () => {
	test( 'Should display nothing', async ( {
		admin,
		page,
		editor,
	} ) => {
		await admin.createNewPost();

		await editor.insertBlock( {
			name: 'wc-bretagne-2024/demo'
		} );

		// Block
		await expect( page.locator( '.wc-bretagne-2024-prefix' ) ).toBeVisible();
		await expect( page.locator( '.wc-bretagne-2024-suffix' ) ).toBeVisible();

		await expect( editor.canvas.locator( '.wc-bretagne-prefix' ) ).not.toBeVisible();
		await expect( editor.canvas.locator( '.wc-bretagne-suffix' ) ).not.toBeVisible();
	} );

	test( 'Add prefix displays only prefix', async ( {
		admin,
		page,
		editor,
	} ) => {
		await admin.createNewPost();

		await editor.insertBlock( {
			name: 'wc-bretagne-2024/demo'
		} );

		// Prefix
		const prefix_input = await page.locator( '.wc-bretagne-2024-prefix input' );

		// Prefix
		await prefix_input.fill( 'Prefix' );
		await prefix_input.blur();

		const prefix = await editor.canvas.locator( '.wc-bretagne-prefix' )
		const suffix = await editor.canvas.locator( '.wc-bretagne-suffix' )

		await expect( prefix ).toBeVisible();
		await expect( suffix ).not.toBeVisible();

	} );

	test( 'Add prefix displays only suffix', async ( {
		admin,
		page,
		requestUtils,
		editor,
	} ) => {
		await admin.createNewPost();

		await editor.insertBlock( {
			name: 'wc-bretagne-2024/demo'
		} );

		const suffix_input = await page.locator( '.wc-bretagne-2024-suffix input' );

		// Prefix
		await suffix_input.fill( 'Suffix' );

		const prefix = await editor.canvas.locator( '.wc-bretagne-prefix' )
		const suffix = await editor.canvas.locator( '.wc-bretagne-suffix' )

		await expect( suffix ).toBeVisible();
		await expect( prefix ).not.toBeVisible();
	} );

	test( 'Add prefix and suffix displays both', async ( {
		admin,
		page,
		editor,
	} ) => {
		await admin.createNewPost();

		await editor.insertBlock( {
			name: 'wc-bretagne-2024/demo'
		} );

		const suffix_input = await page.locator( '.wc-bretagne-2024-suffix input' );
		const prefix_input = await page.locator( '.wc-bretagne-2024-prefix input' );

		// Prefix
		await suffix_input.fill( 'Suffix' );
		await prefix_input.fill( 'Prefix' );

		const prefix = await editor.canvas.locator( '.wc-bretagne-prefix' )
		const suffix = await editor.canvas.locator( '.wc-bretagne-suffix' )

		await expect( suffix ).toBeVisible();
		await expect(suffix).toHaveText("Suffix");
		await expect( prefix ).toBeVisible();
		await expect(prefix).toHaveText("Prefix");
	} );
} );
