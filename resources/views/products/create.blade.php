<h1>Crea un nuovo prodotto</h1>

<form action="/products" method="POST">
    @csrf
    <label for="name">Nome del prodotto:</label>
    <input type="text" id="name" name="name" required>
    <br><br>
    <label for="price">Prezzo:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <br><br>
    <label for="description">Descrizione:</label>
    <textarea id="description" name="description"></textarea>
    <br><br>
    <label for="stock">Quantità in magazzino:</label>
    <input type="number" id="stock" name="stock" required>
    <br><br>
    <button type="submit">Crea prodotto</button>
</form>
