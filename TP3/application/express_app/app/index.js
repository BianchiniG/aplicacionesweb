let express = require('express')
let app = express();
let apiRoutes = require("./routes/routes")
let bodyParser = require('body-parser');
let mongoose = require('mongoose');

app.use(bodyParser.urlencoded({
   extended: true
}));

app.use(function(req, res, next) {
   res.header("Access-Control-Allow-Origin", "*");
   res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
   next();
});

app.use(bodyParser.json());

mongoose.connect('mongodb://localhost:27002/tp3');

var db = mongoose.connection;

app.get('/', (req, res) => res.send('Hello World with Express'));

app.use('/api', apiRoutes)

app.listen(9090, function () {
     console.log("Running app on port 9090");
});
