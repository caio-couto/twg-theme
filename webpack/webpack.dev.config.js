const config = require("./webpack.common.config");
const { merge } = require("webpack-merge");
const path = require("path");

console.log(path.resolve(__dirname, ".."));

module.exports = merge(config,
{
  mode: "development",
  devtool: 'inline-source-map',
  module:
  {
    rules:
    [
      {
        test: /\.ts(x)?$/,
        loader: 'ts-loader',
        exclude: /node_modules/
      },
      {
        test: /\.svg$/,
        use: 'file-loader'
      },
      {
        test: /\.png$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              mimetype: 'image/png'
            }
          }
        ]
      }
    ]
  },
});

