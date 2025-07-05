<?php
// Mulai atau lanjutkan sesi
session_start();

// Hapus semua data sesi
session_unset();
session_destroy();

// Arahkan pengguna ke halaman login atau halaman lain yang Anda inginkan
header('Location: index.php');
