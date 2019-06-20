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


class ActivityClass {
    hasTag(tag_id) {
        var has = false;
        this.tags.forEach(tag => {
            if (tag == tag_id) {
                has = true;
            }
        });
        return has;
    }

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

// Funciones estaticas.
activitySchema.statics.getNextId = function() {
    Activity.find(function(err, activities) {
        id = 0;
        console.log(id);
        if (err) {
            console.log("err");
            return false;

        } else {
            if (activities.len) {
                console.log("hay");
                return activities[activities.length - 1] + 1; 
            }
            console.log("no hay");
            return "1";
        }
    });
}

activitySchema.loadClass(ActivityClass);

var Activity = module.exports = mongoose.model('activity', activitySchema);
module.exports.get = function (callback, limit) {
    Activity.find(callback).limit(limit);
}
