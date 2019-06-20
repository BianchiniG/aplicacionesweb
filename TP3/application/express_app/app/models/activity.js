var mongoose = require('mongoose');

var activitySchema = mongoose.Schema({
    id: {
        type: Number,
        required: true
    },
    title : {
        type: String,
        required: true
    },
    short_description : {
        type: String,
        required: true
    },
    long_description : {
        type: String,
        required: true
    },
    tags : {
        type: Array,
        required: false
    },
    coordinates : {
        type: Array,
        required: false
    }
});

var Activity = module.exports = mongoose.model('activity', activitySchema);
module.exports.get = function (callback, limit) {
    Activity.find(callback).limit(limit);
}
