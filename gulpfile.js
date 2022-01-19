
import gulp from "gulp";
import rename from "gulp-rename";
import terser from "gulp-terser";
import squoosh from "gulp-libsquoosh";
import { htmlValidator } from "gulp-w3c-html-validator";
import svgSprite from "gulp-svg-sprite";
import postcss from "gulp-postcss";
import plumber from "gulp-plumber";
import twig from "gulp-twig";
import htmlmin from "gulp-htmlmin";

import postUrl from "postcss-url";
import postImport from "postcss-import";
import postScss from "postcss-scss";
import postMediaMinMax from "postcss-media-minmax";
import postCustomMedia from "postcss-custom-media";
import csso from "postcss-csso";

import autoprefixer from "autoprefixer";
import browser from "browser-sync";
import del from "del";

import data from "./source/templates/data.js";


const { src, dest, watch, series, parallel } = gulp;

export function processMarkup () {
  return src("./source/html/*.html")
    .pipe(twig({
      data: data
    }))
    .pipe(htmlmin({ collapseWhitespace: true }))
    .pipe(dest("./build"));
}

export function validateMarkup () {
  return src("./source/html/*.html")
  .pipe(twig({
    data: data
  }))
  .pipe(dest("./build"))
  .pipe(htmlValidator.analyzer())
  .pipe(htmlValidator.reporter());
}

export function processStyles () {
  return src("./source/css/*.css", { sourcemaps: true })
    .pipe(plumber())
    .pipe(postcss([
      postImport(),
      postUrl()],))
    // ], { syntax: css } ))
    // .pipe(css().on("error", style.logError))
    .pipe(postcss([
      postMediaMinMax(),
      postCustomMedia(),
      autoprefixer(),
      csso()
    ]))
    .pipe(
      rename({
        extname: ".min.css"
      })
    )
    .pipe(dest("./build/css", { sourcemaps: "." }))
    .pipe(browser.stream());
}

export function processScripts () {
  return src("./source/js/*.js")
    .pipe(terser())
    .pipe(
      rename({
        extname: ".min.js"
      })
    )
    .pipe(dest("./build/js"))
    .pipe(browser.stream());
}

export function optimizeImages () {
  return src("./source/img/**/*.{png,jpg}")
    .pipe(squoosh())
    .pipe(dest("build/img"))
}

export function copyImages () {
  return src("./source/img/**/*.{png,jpg}")
    .pipe(dest("build/img"))
}

export function createWebp () {
  return src("./source/img/**/*.{jpg,png}")
    .pipe(
      squoosh({
        webp: {}
      })
    )
    .pipe(dest("./build/img"))
}

export function createAvif () {
  return src("./source/img/**/*.{jpg,png}")
    .pipe(
      squoosh({
        avif: {}
      })
    )
    .pipe(dest("./build/img"))
}

export function createSprite () {
  return src("./source/icons/*.svg")
    .pipe(svgSprite({
      mode: {
        stack: {
          sprite: "../sprite.svg"
        }
      },
    }
    ))
    .pipe(dest("./build/icons"));
}

export function copyAssets (done) {
  src([
    "./source/fonts/*.{woff2,woff}",
    "./source/*.ico",
    "./source/img/**/*.svg",
    "./source/favicons/*",
    "./source/*.webmanifest",
    "./source/php/*.php"
  ], {
    base: "./source"
  })
    .pipe(dest("./build"))
  done();
}

export function removeBuild () {
  return del("./build");
};

export function startServer (done) {
  browser.init({
    server: {
      baseDir: "./build"
    },
    cors: true,
    notify: false,
    ui: false,
  });
  done();
}

function reloadServer (done) {
  browser.reload();
  done();
}

function watchFiles () {
  watch("./source/css/**/*.css", series(processStyles));
  watch("./source/js/*.js", series(processScripts, reloadServer));
  watch(["./source/**/*.{html,twig}", "./source/templates/data.js"], series(processMarkup, reloadServer));
  watch(["./source/php/*.php"], series(reloadServer));
  watch("./source/icons/**/*.svg", series(createSprite, reloadServer));
}

// Production build

export const build = series(
  removeBuild,
  copyAssets,
  optimizeImages,
  parallel(
    processStyles,
    processMarkup,
    processScripts,
    //createSprite,
    createWebp,
    //createAvif
  )
);

// Development build

export default series(
  removeBuild,
  copyAssets,
  copyImages,
  parallel(
    processStyles,
    processMarkup,
    processScripts,
    //createSprite,
    createWebp,
    //createAvif
  ),
  series(
    startServer,
    watchFiles
  )
);
