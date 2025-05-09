<?php
session_start();
echo json_encode(['logged_in' => isset($_SESSION['Roll_Number'])]);
