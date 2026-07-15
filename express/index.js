const express = require('express');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const employees = [
    { id: 1, name: 'Fathur', role: 'Full Stack', department: 'IT' },
    { id: 2, name: 'John', role: 'Backend', department: 'IT' },
    { id: 3, name: 'Jane', role: 'HR Staff', department: 'HR' }
];

app.get('/api/employees', (req, res) => {
    const dept = req.query.dept;
    if (dept) {
        return res.json(employees.filter(e => e.department.toLowerCase() === dept.toLowerCase()));
    }
    res.json(employees);
});

app.post('/api/employees', (req, res) => {
    const { name, role, department } = req.body;
    if (!name || !role || !department) return res.status(400).json({ error: 'Missing fields' });

    const newEmp = { id: employees.length + 1, name, role, department };
    employees.push(newEmp);
    res.status(201).json(newEmp);
});

const PORT = 3000;
app.listen(PORT, () => console.log(`API running on port ${PORT}`));
