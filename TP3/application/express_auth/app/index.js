const MongoClient = require('mongodb').MongoClient;
const express = require('express');
const app = express();


MongoClient.connect('mongodb://localhost:27001', { useNewUrlParser: true }).then(client => {
  const db = client.db('tp3');

  app.get('/usuarios', (req, res) => {
    var resultado = db.collection('users').find().toArray();
    res.send(typeof(resultado))
  });

  app.listen(8080, () => {
    console.log('Example app listening on port 8080!')
  });
});
