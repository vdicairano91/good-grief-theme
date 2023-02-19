const path = require("path");

module.exports = {
  mode: "production",
  performance: {
    hints: false
  },
  output: {
    filename: "main.bundle.js"
  },
  module: {
    rules: [
      {
        test: /\.js?$/,
        include: [path.resolve(__dirname, "library/js")],
        loader: "babel-loader",
        options: {
          presets: ["@babel/preset-env"]
        }
      }
    ]
  }
};