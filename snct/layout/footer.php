<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    footer {
        background-color: #0F1B42;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        width: 100%;
        position: relative;
        margin-top: auto;
    }

    .container-footer {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .social-media {
        list-style: none;
        padding: 0;
        margin: 10px 0 0 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .social-media li {
        margin: 0 10px;
    }

    .social-media a {
        color: #fff;
        text-decoration: none;
    }

    .social-media a:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .social-media {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
<footer>
    <div class="container-footer">
        <br>
        <p>&copy; <?php echo date("Y"); ?> Study Space. Todos os direitos reservados.</p>
        <ul class="social-media">

    </div>
    <?php include'../layout/script.php';?>
</footer>