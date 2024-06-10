<?php
require_once('db.php');

// Funções para clientes
function cadastrarCliente($nome, $email, $senha) {
    $conn = conectarBanco();
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senhaHash);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function fazerLogin($email, $senha) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT cliente_id, senha FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($clienteId, $senhaHash);
        $stmt->fetch();
        if (password_verify($senha, $senhaHash)) {
            session_start();
            $_SESSION['cliente_id'] = $clienteId;
            $stmt->close();
            $conn->close();
            return true;
        }
    }
    
    $stmt->close();
    $conn->close();
    return false;
}

function clienteLogado() {
    return isset($_SESSION['cliente_id']);
}

function logoutCliente() {
    session_start();
    session_destroy();
}

function getClienteById($clienteId) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT cliente_id, nome, email FROM clientes WHERE cliente_id = ?");
    $stmt->bind_param("i", $clienteId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result;
}

// Funções para produtos
function cadastrarProduto($nome, $descricao, $preco, $imagem) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nome, $descricao, $preco, $imagem);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function listarProdutos() {
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT produto_id, nome, descricao, preco, imagem FROM produtos");
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $result;
}

function getProdutoById($produtoId) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("SELECT produto_id, nome, descricao, preco, imagem FROM produtos WHERE produto_id = ?");
    $stmt->bind_param("i", $produtoId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result;
}

function atualizarProduto($produtoId, $nome, $descricao, $preco, $imagem) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, imagem = ? WHERE produto_id = ?");
    $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $imagem, $produtoId);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}

function deletarProduto($produtoId) {
    $conn = conectarBanco();
    $stmt = $conn->prepare("DELETE FROM produtos WHERE produto_id = ?");
    $stmt->bind_param("i", $produtoId);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}
?>
