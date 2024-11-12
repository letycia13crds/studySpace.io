<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Biomas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body>
    <?php
    include '../layout/cabecalho.php';
    ?>
    <BR></BR>
    <h1 style="text-align: center;">Exploração dos Biomas</h1>
    <BR></BR>
    <!-- Imagem e texto -->
    <div class="container">
        <div class="row g-4" id="biomas-container">
            <!-- Os cartões dos biomas serão gerados aqui -->
        </div>
    </div>

    <script>
        // Dados dos biomas em ordem específica
        const biomas = [{
                nome: "Caatinga",
                imagem: "imagens/caatinga.jpg",
                descricao: "A Caatinga é um bioma exclusivamente brasileiro, caracterizado por uma vegetação xerófila adaptada ao clima semiárido.",
                linkVideo: "https://youtu.be/bI3pb6_JvU4?si=_sffYGxo806rJyxY",
                mensagemQR: "Explorar Caatinga em 360°"
            },
            {
                nome: "Cerrado",
                imagem: "imagens/cerrado.jpg",
                descricao: "O Cerrado é o segundo maior bioma da América do Sul, conhecido por sua savana tropical com árvores de troncos tortuosos.",
                linkVideo: "https://www.youtube.com/watch?v=49Nux1-hxlQ",
                mensagemQR: "Explorar Cerrado em 360°"
            },
            {
                nome: "Floresta Amazônica",
                imagem: "imagens/floresta_amazonica.jpeg",
                descricao: "A maior floresta tropical do mundo, a Amazônia é essencial para o equilíbrio climático global.",
                linkVideo: "https://www.youtube.com/watch?v=GC6ejxKwbFw&t=7s",
                mensagemQR: "Explorar Amazônia em 360°"
            },
            {
                nome: "Mata Atlântica",
                imagem: "imagens/mata_atlantica.jpg",
                descricao: "A Mata Atlântica é um bioma altamente ameaçado, mas ainda abriga uma rica biodiversidade.",
                linkVideo: "https://www.youtube.com/watch?v=slRGp5xWnUg",
                mensagemQR: "Explorar Mata Atlântica em 360°"
            },
            {
                nome: "Pampa",
                imagem: "imagens/pampa.jpg",
                descricao: "Os Pampa são caracterizados por extensas pradarias, importantes para a pecuária e agricultura.",
                linkVideo: "https://www.youtube.com/watch?v=1L-hK-iE-4A",
                mensagemQR: "Explorar Pampa em 360°"
            },
            {
                nome: "Pantanal",
                imagem: "imagens/pantanal.jpg",
                descricao: "O Pantanal é a maior planície inundável do mundo, conhecida por sua rica fauna e flora.",
                linkVideo: "https://www.youtube.com/watch?v=yGhde2dyNms",
                mensagemQR: "Explorar Pantanal em 360°"
            }
        ];

        // Função para gerar o QR Code dentro de um elemento
        function generateQRCode(elementId, url) {
            new QRCode(document.getElementById(elementId), {
                text: url,
                width: 80,
                height: 80,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }

        // Renderiza os cartões dos biomas no container
        const container = document.getElementById("biomas-container");
        biomas.forEach(bioma => {
            const card = document.createElement("div");
            card.className = "col-md-4 d-flex align-items-stretch";

            card.innerHTML = `
                <div class="card">
                    <img src="${bioma.imagem}" class="card-img-top" alt="${bioma.nome}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${bioma.nome}</h5>
                        <p class="card-text">${bioma.descricao}</p>
                        <div class="qrcode-container mt-auto">
                            <div id="qrcode-${bioma.nome}" class="qrcode"></div>
                            <p class="qrcode-text">${bioma.mensagemQR}</p>
                        </div>
                    </div>
                </div>
            `;

            container.appendChild(card);

            // Gera QR Code para o link do vídeo do bioma e permite abrir o link ao clicar
            generateQRCode(`qrcode-${bioma.nome}`, bioma.linkVideo);
            document.getElementById(`qrcode-${bioma.nome}`).onclick = () => window.open(bioma.linkVideo, "_blank");
        });
    </script>

    <!-- Botão para retornar ao menu principal -->
    <div class="central-button-container">
    </div>
    <br></br>
    <?php
    include '../layout/footer.php';
    ?>
</body>
</html>