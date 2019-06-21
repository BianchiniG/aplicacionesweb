var mongoose = require('mongoose');

var activitySchema = mongoose.Schema({
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

class ActivityClass {
    updateData(data) {
        this.title = data.title;
        this.short_description = data.short_description;
        this.long_description = data.long_description;
        if (data.tags.length) {
            // Add the new tags if they exist and are not already present on the array.
        }
        this.coordinates = data.coordinates;
        this.save();
        return true;
    }
}

activitySchema.loadClass(ActivityClass);

var Activity = module.exports = mongoose.model('activity', activitySchema);
module.exports.get = function (callback, limit) {
    Activity.find(callback).limit(limit);
}
