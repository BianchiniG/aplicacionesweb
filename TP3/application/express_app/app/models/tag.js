var mongoose = require('mongoose');

var tagSchema = mongoose.Schema({
    id: {
        type: Number,
        required: true
    },
    name: {
        type: String,
        required: true
    }
});

var Tag = module.exports = mongoose.model('tag', tagSchema);
module.exports.get = function (callback, limit) {
    Tag.find(callback).limit(limit);
}
