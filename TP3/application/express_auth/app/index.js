const express = require('express')
const app = express();

var db = require('./database/db');


db.connect(function(status) {
  if (status) {
    console.log("Connected to the database");
    var db_instance = status;

    app.get('/', (req, res) => {
      res.send('Soy el backend de app')
    });
    
    app.post('/get_token', (req, res) => {
      // Ask for the user.      
      user = db_instance.collection();

      // Check if the user exists in the database and the password is correct
      if (user) {
        // Generate token
        var token = '';
      } else {
        // Return that the user does not exists.
        var json = {
          'code': 404,
          'message': 'The specified user does not exists or the password is incorrect',
          'data': req
        }

        return json;  // TODO: Encode it properly.
      }
      res.send(JSON.parse(json));
    });

    app.listen(8080, () => {
      console.log('Example app listening on port 8080!')
    });
  } else {
    console.log('Unable to connect to Mongo.')
    process.exit(1)
  }
})
