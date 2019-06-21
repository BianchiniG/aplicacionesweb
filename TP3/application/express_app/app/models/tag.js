var mongoose = require('mongoose');

var tagSchema = mongoose.Schema({
    name: {
        type: String,
        required: true
    }
});

var Tag = module.exports = mongoose.model('tag', tagSchema);
module.exports.get = function (callback, limit) {
    Tag.find(callback).limit(limit);
}
