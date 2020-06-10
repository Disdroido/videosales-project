<?php
// Cloudinary upload
Cloudinary::config(array(
  "cloud_name" => "videosales",
  "api_key" => "534325556641693",
  "api_secret" => "aSUkKnn9xC-ZZrFZS5Tl0DRii9k"
));

if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {
  $cors_location = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] .
    dirname($_SERVER["SCRIPT_NAME"]) . "/cloudinary_cors.html";
} else {
  $cors_location = "https://" . $_SERVER["HTTP_HOST"] . "/cloudinary_cors.html";
}
