import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import collectModuleAssetsPaths from "./vite-module-loader.js";
import inject from '@rollup/plugin-inject';

async function getConfig() {
    const paths = [
        "resources/css/app.scss",
        "resources/assets/scss/main.scss",
        "resources/js/app.js",
        "resources/js/theme-clock.js",
        "resources/js/datatables.js",
        "resources/js/ckeditor.js",
        "resources/js/app/chat/chat-app.js",
    ];
    const allPaths = await collectModuleAssetsPaths(paths, "Modules");

    return defineConfig({
        plugins: [
            laravel({
                input: allPaths,
                refresh: true,
            }),
            inject({
                $: 'jquery',
                jQuery: 'jquery',
                include: ['**/*.js'],
                exclude: ['node_modules/ckeditor5/**'],
            }),
        ],
        define: {
            "process.env.IS_PREACT": JSON.stringify("true"),
        },
        optimizeDeps: {
            exclude: ["js-big-decimal"],
        },
        resolve: {
            alias: {
                jquery: 'jquery/dist/jquery.js',
            },
        },
        assetsInlineLimit: 0
    });
}

export default getConfig();
