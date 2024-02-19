const path = require("path");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = (env, argv) => {
    return {
        entry: "./src/assets/scripts/main.js",
        output: {
            path: path.resolve(__dirname, "public/js"),
            filename: "script.js"
        },
        watchOptions: {
            ignored: "**/node_modules"
        },
        optimization: {
            minimizer: [
                new TerserPlugin({
                    terserOptions: {
                        format: {
                            comments: false,
                        }
                    },
                    extractComments: false
                })
            ]
        },
        devtool: argv.mode == "development" ? "eval" : "source-map"
    }
}