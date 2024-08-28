const config = require("./webpack.common.config");
const { merge } = require("webpack-merge");
const path = require("path");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

 module.exports = merge(config,
{
  mode: "production",
  optimization:
  {
    minimize: true,
    minimizer:
    [
      `...`,
      new CssMinimizerPlugin(
      {
        minimizerOptions:
        {
          preset:
          [
            "default",
            {
              discardComments: { removeAll: true }
            }
          ]
        }
      })
    ]
  },
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
  }
});