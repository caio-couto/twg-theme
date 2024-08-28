const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const config =
{
  entry:
  [
    "./src/scripts/main.ts"
  ],
  output:
  {
    path: path.resolve(__dirname, '../assets'),
    filename: '[name].min.js',
    clean: true
  },
  resolve:
  {
    extensions:
    [
      '.tsx',
      '.ts',
      '.js'
    ]
  },
  module:
  {
    rules:
    [
      {
        test: /\.(sc|sa|c)ss$/,
        exclude: /node_modules/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader',
        ]
      },
    ]
  },
  plugins:
  [
    new MiniCssExtractPlugin({ filename: "[name].min.css" })
  ]
};

module.exports = config;