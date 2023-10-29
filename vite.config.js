import { defineConfig, loadEnv } from "vite";
// import react from "@vitejs/plugin-react";

import laravel from "laravel-vite-plugin";

export default ({ mode }) => {
    const { APP_URL } = loadEnv(mode, process.cwd(), "");

    return defineConfig({
        plugins: [
            laravel({
                input: ["resources/css/app.scss"],

                refresh: true,
            }),
            // react(),
            {
                // fixes URLs that start with / in CSS files

                // make sure to have vite.loadEnv imported and APP_URL defined

                name: "css-static-url-fixer",

                enforce: "post",

                apply: "serve",

                transform: (code, file) => {
                    if (mode === "development" && file.match(/\.s?css($|\?)/)) {
                        return {
                            code: code.replaceAll(
                                /url\(([\'\"]?)(\/[^\)\'\"]+)\1\)/g,
                                `url($1${APP_URL}$2$1)`
                            ),
                        };
                    }
                },
            },
        ],
    });
};
