/**
 * External dependencies
 */
import { join } from 'node:path';
import { defineConfig } from '@playwright/test';

/**
 * WordPress dependencies
 */
// @ts-ignore
import baseConfig from '@wordpress/scripts/config/playwright.config.js';

process.env.WP_ARTIFACTS_PATH ??= join( process.cwd(), 'artifacts' );
process.env.STORAGE_STATE_PATH ??= join(
	process.env.WP_ARTIFACTS_PATH,
	'storage-states/admin.json'
);
process.env.TEST_ITERATIONS ??= '20';

const config = defineConfig( {
	...baseConfig,
	forbidOnly: !! process.env.CI,
	workers: 1,
	retries: 0,
	repeatEach: 1,
	timeout: parseInt( process.env.TIMEOUT || '', 10 ) || 600_000, // Defaults to 10 minutes.
} );

export default config;
