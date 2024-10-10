<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List.js - Paginação, Filtro de Preço e Data</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <style>
        .list{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        .item {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100px;
            transition: all 0.5s;
        }
        .item:hover{
            background-color: cornflowerblue;
            cursor: pointer;
            transform: scale(1.25);
        }

        .item > div {
            width: 15%;
        }

        .controls {
            margin-bottom: 20px;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination li {
            display: inline;
            margin-right: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        #editar{
            width: 100%;
            height: 100%;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(54, 54, 54, 0.585);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #editar div{
            background-color: white;
            width: 500px;
            height: 500px;
            animation: anima1 2s forwards ;
        }
        @keyframes anima1 {
            from{
                margin-top: -800px;
                opacity: 0;
            }
            to{
                margin-top: 0px;
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div id="editar">
        <div>
            conteudo
        </div>
    </div>
    <div class="controls">
        <input class="search" placeholder="Pesquisar" />

        <label for="min-price">Preço Mínimo:</label>
        <input type="number" id="min-price" placeholder="Mínimo" />

        <label for="max-price">Preço Máximo:</label>
        <input type="number" id="max-price" placeholder="Máximo" />

        <label for="start-date">Data Início:</label>
        <input type="date" id="start-date" />

        <label for="end-date">Data Fim:</label>
        <input type="date" id="end-date" />
    </div>

    <div id="products">
        <div class="list">
            <!-- Linhas com colunas de nome, preço, e data -->
            <div class="item">
                <div class="name">Produto 1</div>
                <div class="price">100</div>
                <div class="date">01/01/2024</div>
            </div>
            <div class="item">
                <div class="name">Produto 2</div>
                <div class="price">200</div>
                <div class="date">15/02/2024</div>
            </div>
            <div class="item">
                <div class="name">Produto 3</div>
                <div class="price">150</div>
                <div class="date">10/03/2024</div>
            </div>
            <div class="item">
                <div class="name">Produto 4</div>
                <div class="price">50</div>
                <div class="date">25/04/2024</div>
            </div>
            <div class="item">
                <div class="name">Produto 4</div>
                <div class="price">50</div>
                <div class="date">25/04/2024</div>
            </div>
            <div class="item">
                <div class="name">Produto 4</div>
                <div class="price">50</div>
                <div class="date">25/04/2024</div>
            </div>
            <script>
                for(var i=1; i<=1000; i++){
                    document.write("<div class='item'><div class='name'>Produto Teste"+ i+"</div><div class='price'>50</div><div class='date'>25/04/2024</div></div>");
                }
            </script>
            <!-- Adicione mais itens conforme necessário -->
        </div>

        <ul class="pagination"></ul>
    </div>

    <script>
        // Inicializando a lista com List.js
        var options = {
            valueNames: ['name', 'price', 'date'],
            page: 55, // Quantos itens por página
            pagination: true // Ativa a paginação
        };

        var productList = new List('products', options);

        // Filtro de Preço (intervalo entre mínimo e máximo)
        document.getElementById('min-price').addEventListener('input', function() {
            filterByPrice();
        });

        document.getElementById('max-price').addEventListener('input', function() {
            filterByPrice();
        });

        function filterByPrice() {
            var minPrice = parseFloat(document.getElementById('min-price').value) || 0;
            var maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;

            productList.filter(function(item) {
                var price = parseFloat(item.values().price);
                return price >= minPrice && price <= maxPrice;
            });
        }

 // Filtro de Data (intervalo entre datas)
 document.getElementById('start-date').addEventListener('change', function() {
        filterByDate();
    });

    document.getElementById('end-date').addEventListener('change', function() {
        filterByDate();
    });

    function filterByDate() {
        var startDate = new Date(document.getElementById('start-date').value);
        var endDate = new Date(document.getElementById('end-date').value);

        productList.filter(function(item) {
            var itemDateStr = item.values().date; // Captura o valor da data como string
            var itemDate = parseDate(itemDateStr); // Converte para objeto Date

            if (isNaN(startDate.getTime()) && isNaN(endDate.getTime())) {
                return true; // Sem filtro de data
            } else if (!isNaN(startDate.getTime()) && isNaN(endDate.getTime())) {
                return itemDate >= startDate;
            } else if (isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                return itemDate <= endDate;
            } else {
                return itemDate >= startDate && itemDate <= endDate;
            }
        });
    }

    // Função para converter data no formato dd/mm/yyyy para Date
    function parseDate(dateStr) {
        var parts = dateStr.split('/');
        var day = parseInt(parts[0], 10);
        var month = parseInt(parts[1], 10) - 1; // Mês é baseado em zero no JavaScript
        var year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }

        // Resetar filtro de preço e data ao buscar
        productList.on('searchComplete', function() {
            productList.filter();
        });
    </script>

    <form action="testes.php" method="get">
        <input type="date" name="danasc" id="" value="2025-01-23">
        <input type="submit" value="">
    </form>
</body>
</html>

