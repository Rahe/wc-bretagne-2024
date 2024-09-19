import { expect, test } from '@wordpress/e2e-test-utils-playwright';
/**
 * External dependencies
 */
import path from 'path';

test.describe( 'Check the column', () => {
	test( 'Should display 1 min', async ( {
		admin,
		page,
		requestUtils,
		editor,
	} ) => {
		await admin.createNewPost();

		await editor.insertBlock( {
			name: 'wc-bretagne-2024/demo'
		} );

		await editor.publishPost();

		await admin.visitAdminPage( '/edit.php' );

		// Index column
		await expect( page.locator( '#wc_bretagne' ) ).toBeVisible();
		await expect( page.locator( 'td.wc_bretagne' ).first() ).toHaveText(
			'1 min'
		);
	} );

} );
