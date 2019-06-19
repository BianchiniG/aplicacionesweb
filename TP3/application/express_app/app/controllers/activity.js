Activity = require('../models/activity');

exports.index = function (req, res) {
    Activity.get(function (err, activities) {
        if (err) {
            res.json({
                status: "error",
                message: err,
            });
        }
        res.json({
            status: "success",
            message: "Activities retrieved successfully",
            data: activities
        });
    });
};

exports.new = function (req, res) {
    var activity = new Activity();
    activity.title = req.body.title;
    activity.short_descripcion = req.body.short_description;
    activity.long_description = req.body.long_description;
    if (req.body.tags)
        activity.tags = req.body.tags;
    if (req.body.coordinates)
        activity.coordinates = req.body.coordinates;

    activity.save(function (err) {
        res.json({
            message: 'New activity created!',
            data: activity
        });
    });
};

exports.view = function (req, res) {
    Activity.findById(req.params.activity_id, function (err, activity) {
        if (err)
            res.send(err);
        res.json({
            message: 'Activity details loading..',
            data: activity
        });
    });
};

exports.update = function (req, res) {
    Activity.findById(req.params.activity_id, function (err, activity) {
        if (err)
            res.send(err);
        activity.name = req.body.name;

        activity.save(function (err) {
            if (err)
                res.json(err);
            res.json({
                message: 'Activity Info updated',
                data: activity
            });
        });
    });
};

exports.delete = function (req, res) {
    Activity.remove({
        _id: req.params.activity_id
    }, function (err, activity) {
        if (err)
            res.send(err);
        res.json({
            status: "success",
            message: 'Activity deleted'
        });
    });
};

exports.getByTag = function (req, res) {
    res.json({
        status: "success",
        message: "Not implemented yet!",
        data: []
    });
};

exports.getByCoordinates = function (req, res) {
    res.json({
        status: "success",
        message: "Not implemented yet!",
        data: []
    });
};

exports.getBetweenDates = function (req, res) {
    res.json({
        status: "success",
        message: "Not implemented yet!",
        data: []
    });
};

exports.getByKeyword = function (req, res) {
    res.json({
        status: "success",
        message: "Not implemented yet!",
        data: []
    });
};
