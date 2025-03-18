<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Tanindo | Bersertifikasi untuk Masa Depan Pertanian</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('template/tanindo/') ?>assets/img/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-icon-tanindo.png" />
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-icon-tanindo.png" />
  <link rel="manifest" href="<?= base_url('template/tanindo/') ?>assets/img/favicons/manifest.json" />
  <meta name="msapplication-TileImage" content="<?= base_url('template/tanindo/') ?>assets/img/favicons/mstile-150x150.png" />
  <meta name="theme-color" content="#ffffff" />

  <link rel="manifest" href="assets/img/favicons/manifest.json" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="<?= base_url('template/tanindo/') ?>assets/css/theme.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet" />
  <meta name="description" content="LSP Tanindo adalah lembaga sertifikasi profesi yang bertanggung jawab dalam melaksanakan sertifikasi kompetensi profesi bidang pertanian. Menyediakan sertifikasi bagi individu yang memiliki keterampilan dan pengetahuan yang dibutuhkan dalam industri pertanian." />
  <meta name="keywords" content="LSP Tanindo, sertifikasi pertanian, sertifikasi kompetensi, lembaga sertifikasi profesi, kompetensi pertanian, sertifikasi SDM pertanian" />

  <style>
    .google-map {
      padding-bottom: 50%;
      position: relative;
    }

    .google-map iframe {
      height: 100%;
      width: 100%;
      left: 0;
      top: 0;
      position: absolute;
    }

    #gallery {
      line-height: 0;
      -webkit-column-count: 5;
      /* split it into 5 columns */
      -webkit-column-gap: 5px;
      /* give it a 5px gap between columns */
      -moz-column-count: 5;
      -moz-column-gap: 5px;
      column-count: 5;
      column-gap: 5px;
    }

    #gallery img {
      width: 100% !important;
      height: auto !important;
      margin-bottom: 5px;
      /* to match column gap */
    }

    /* @media (max-width: 1200px) {
      #gallery {
        -moz-column-count: 4;
        -webkit-column-count: 4;
        column-count: 4;
      }
    } */

    @media (max-width: 1000px) {
      #gallery {
        -moz-column-count: 3;
        -webkit-column-count: 3;
        column-count: 3;
      }
    }

    @media (max-width: 800px) {
      #gallery {
        -moz-column-count: 2;
        -webkit-column-count: 2;
        column-count: 2;
      }
    }

    @media (max-width: 400px) {
      #gallery {
        -moz-column-count: 1;
        -webkit-column-count: 1;
        column-count: 1;
      }
    }

    #gallery img:hover {
      filter: none;
    }

    /* Floating Chat Button */
    .chat-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      font-size: 24px;
      cursor: pointer;
    }

    .chat-btn.new-message {
      background-color: red;
      /* Change color to indicate new messages */
      animation: pulse 1s infinite alternate;
    }

    @keyframes pulse {
      from {
        transform: scale(1);
      }

      to {
        transform: scale(1.1);
      }
    }


    .chat-btn:hover {
      background-color: #28a745;
    }

    /* Chat Box */
    .chat-box {
      position: fixed;
      bottom: 80px;
      right: 20px;
      width: 300px;
      background: white;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      display: none;
      flex-direction: column;
    }

    .chat-header {
      background: #28a745;
      color: white;
      padding: 10px;
      border-radius: 10px 10px 0 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .chat-body {
      height: 250px;
      padding: 10px;
      overflow-y: auto;
      font-size: 14px;
    }

    .chat-footer {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ddd;
    }

    .chat-footer input {
      flex: 1;
      margin-right: 5px;
    }

    /* Chat Message Container */
    #chatMessages {
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding: 10px;
    }

    /* Base Chat Bubble */
    .chat-bubble {
      max-width: 80%;
      padding: 10px 15px;
      border-radius: 15px;
      font-size: 14px;
      line-height: 1.4;
      word-wrap: break-word;
      display: inline-block;
    }

    /* Admin Message (Align Left) */
    .admin-message {
      background-color: #f0f0f0;
      color: #333;
      align-self: flex-start;
      border-top-left-radius: 0px;
    }

    /* Guest Message (Align Right) */
    .guest-message {
      background-color: #28a745;
      color: white;
      align-self: flex-end;
      border-top-right-radius: 0px;
    }

    /* Floating Chat Window */
    .chat-box {
      position: fixed;
      bottom: 80px;
      right: 20px;
      width: 300px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      display: none;
      flex-direction: column;
    }

    /* Chat Header */
    .chat-header {
      /* background: #007bff; */
      color: white;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    /* Chat Footer */
    .chat-footer {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ddd;
      background: white;
    }

    .chat-footer input {
      flex: 1;
      border-radius: 20px;
      padding: 8px;
      border: 1px solid #ddd;
    }

    .chat-footer button {
      margin-left: 5px;
      border-radius: 20px;
    }
  </style>
</head>

<body>