var MongoClient = require('mongodb').MongoClient

var state = {
  db: null,
}

exports.connect = function(url, done) {
  if (state.db) return state.db

  MongoClient.connect('mongodb://localhost:27001/tp3', { useNewUrlParser: true }, function(err, db) {
    if (err) 
      return false

    state.db = db
    return db
  })
}

exports.get = function() {
  return state.db
}

exports.close = function(result) {
  if (state.db) {
    state.db.close(function(err, result) {
      state.db = null
      state.mode = null
      return false
    })
  }
}