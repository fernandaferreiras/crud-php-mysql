<?php
session_start();

if (isset($_SESSION['idSessao'])) {
    header('location: ./listagem/');
} else {
    header('location: ./login/');
}
