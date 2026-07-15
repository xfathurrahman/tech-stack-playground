const express = require('express');
const cors = require('cors');

const app = express();

app.use(express.json());
app.use(cors());

let inventory = [
    { id: 1, name: "Arabika Gayo", stock: 15 },
    { id: 2, name: "Robusta Temanggung", stock: 0 }
];

app.get('/api/inventory', (req, res) => {
    const isAvailable = req.query.available;

    if (isAvailable === 'true') {
        const filteredData = inventory.filter(item => item.stock > 0);
        return res.json(filteredData);
    }

    res.json(inventory);
});

app.post('/api/inventory', (req, res) => {
    const { name, stock } = req.body;

    if (!name || stock === undefined) {
        return res.status(400).json({ error: "Nama dan stok harus diisi" });
    }

    const newItem = {
        id: inventory.length + 1,
        name: name,
        stock: parseInt(stock)
    };

    inventory.push(newItem);

    res.status(201).json(newItem);
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server Kedai Kopi berjalan di http://localhost:${PORT}`);
});
