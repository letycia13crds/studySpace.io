<?php
include '../bd/session.php';
include '../bd/conexao.php';

$matricula = $_SESSION['login'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE matricula = ?");
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_completo = $row['nome_completo'];
} else {
    echo "Erro: Dados do usuário não encontrados.";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="../layout/style_global.css">

<?php
include '../layout/head.php';
?>

<body>
    <?php include '../layout/cabecalho.php'; ?>
    <br><br>
    <div class="container-principal">
        <h1 class="titulo">Semana Nacional de Ciência e Tecnologia (SNCT)</h1>
        <div class="secao">

            <div class="introducao">
                <h2>O que é a SNCT?</h2>
                <p>
                    A Semana Nacional de Ciência e Tecnologia (SNCT) é um evento anual
                    promovido pelo Ministério da Ciência, Tecnologia e Inovações (MCTI)
                    do Brasil. Ela tem como objetivo aproximar a ciência e a tecnologia
                    da população, promovendo atividades que incentivem o interesse e o
                    conhecimento sobre temas relacionados à inovação, ciência e educação
                    científica.
                </p>
                <p>
                    Desde a sua criação em 2004, a SNCT vem sendo realizada em todo o
                    território brasileiro, com a participação de universidades, escolas,
                    museus, centros de pesquisa e outras instituições voltadas para a
                    disseminação do conhecimento.
                </p>
            </div>
        </div>

        <div class="secao secao-reversa">
        <img class="img-responsiva" src="../layout/objetivo.png" alt="Imagem representando tecnologia" />
            <div>
                <h2>Objetivos da SNCT</h2>
                <p>
                    A SNCT tem como principal objetivo promover o conhecimento científico
                    e tecnológico para toda a sociedade, mostrando como esses campos
                    impactam nossas vidas cotidianas e o desenvolvimento sustentável.
                </p>
                <p>Além disso, a SNCT busca:</p>
                <ul>
                    <li>Incentivar a popularização da ciência entre jovens e adultos;</li>
                    <li>Mostrar a importância da inovação tecnológica para o crescimento econômico e social;</li>
                    <li>Promover atividades interativas, como feiras de ciência, oficinas, exposições e palestras;</li>
                    <li>Integrar instituições de ensino, pesquisa e tecnologia com a sociedade.</li>
                </ul>
            </div>
        </div>

        <h2>Tema de 2024: Biomas do Brasil</h2>
        <p>
            O tema da SNCT 2024 é "Biomas do Brasil: Diversidade, Saberes e
            Tecnologias Sociais". Este tema visa destacar a importância dos biomas
            brasileiros, sua biodiversidade e os saberes tradicionais que fazem parte
            dessas áreas. Também busca conscientizar sobre o uso sustentável dos
            recursos naturais e o desenvolvimento de tecnologias sociais que
            contribuam para a preservação e recuperação ambiental.
        </p>
        <p>
            O Brasil, com seus diversos biomas, como a Amazônia, Cerrado, Mata
            Atlântica, Caatinga, Pampa e Pantanal, é um dos países mais ricos em
            biodiversidade no mundo. A SNCT 2024 trará debates, oficinas e
            experimentos que explorem como podemos cuidar melhor desses ecossistemas
            e usar a ciência e tecnologia a favor do meio ambiente.
        </p>

        <h2>Como Participar?</h2>
        <p>
            Durante a SNCT, várias atividades são realizadas em todo o Brasil,
            incluindo eventos presenciais e virtuais. Para participar, você pode
            acompanhar as programações das instituições próximas de você, como
            universidades, escolas e museus, ou acessar plataformas online que
            oferecem eventos virtuais. Muitas atividades são abertas ao público e
            gratuitas.
        </p>
    </div>

    <div class="container-link">
        <a href="quiz.php">Quiz</a><br><br>
    </div>

    <?php include '../layout/footer.php'; ?>
</body>
</style>
</html>