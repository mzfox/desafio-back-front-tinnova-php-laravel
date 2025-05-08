
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Veículos - TINNOVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .tag { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
        .tag-true { background-color: #c6f6d5; color: #22543d; }
        .tag-false { background-color: #fed7d7; color: #742a2a; }
    </style>
</head>
<body>
    <h1>Lista de Veículos</h1>
    
    <h2>Adicionar / Editar Veículo</h2>
    <form id="form-veiculo">
        <input type="hidden" name="id" id="veiculo-id">
        <input type="text" name="veiculo" placeholder="Veículo" required>
        <input type="text" name="marca" placeholder="Marca" required>
        <input type="number" name="ano" placeholder="Ano" required>
        <input type="text" name="descricao" placeholder="Descrição">
        <label>
            <input type="checkbox" name="vendido"> Vendido
        </label>
        <button type="submit">Salvar</button>
    </form>

    <table id="tabela-veiculos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Veículo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th>Vendido</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        async function carregarVeiculos() {
            const resposta = await fetch('/api/veiculos');
            const veiculos = await resposta.json();
            const tabela = document.querySelector('#tabela-veiculos tbody');
            tabela.innerHTML = '';

            veiculos.forEach(v => {
                const linha = document.createElement('tr');
                linha.innerHTML = `
                    <td>${v.id}</td>
                    <td>${v.veiculo}</td>
                    <td>${v.marca}</td>
                    <td>${v.ano}</td>
                    <td>${v.descricao}</td>
                    <td><span class="tag ${v.vendido ? 'tag-true' : 'tag-false'}">${v.vendido ? 'Sim' : 'Não'}</span></td>
                    <td>${new Date(v.created_at).toLocaleString('pt-BR')}</td>
                    <td>
                        <button onclick="editar(${v.id})">Editar</button>
                        <button onclick="deletar(${v.id})">Excluir</button>
                    </td>
                `;
                tabela.appendChild(linha);
            });
        }

        async function editar(id) {
            const res = await fetch(`/api/veiculos/${id}`);
            const v = await res.json();

            const form = document.querySelector('#form-veiculo');
            form.id.value = v.id;
            form.veiculo.value = v.veiculo;
            form.marca.value = v.marca;
            form.ano.value = v.ano;
            form.descricao.value = v.descricao;
            form.vendido.checked = v.vendido;

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        async function deletar(id) {
            if (confirm('Deseja realmente excluir o veículo?')) {
                const res = await fetch(`/api/veiculos/${id}`, { method: 'DELETE' });
                if (res.status === 204) carregarVeiculos();
            }
        }

        document.querySelector('#form-veiculo').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const id = form.id.value;
            const data = {
                veiculo: form.veiculo.value,
                marca: form.marca.value,
                ano: parseInt(form.ano.value),
                descricao: form.descricao.value,
                vendido: form.vendido.checked
            };

            const url = id ? `/api/veiculos/${id}` : '/api/veiculos';
            const method = id ? 'PUT' : 'POST';

            const res = await fetch(url, {
                method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            if (res.ok) {
                alert(id ? 'Veículo atualizado!' : 'Veículo cadastrado com sucesso!');
                form.reset();
                form.id.value = '';
                carregarVeiculos();
            } else {
                alert('Erro ao salvar veículo.');
            }
        });

        carregarVeiculos();
    </script>
</body>
</html>
