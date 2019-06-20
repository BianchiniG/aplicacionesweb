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
    // var nextId = Activity.getNextId();  // TODO: Convertir la obtencion del ultimo ID a esto
    Activity.find(function(err, activities) {
        if (err) {
            res.json({
                code: 500,
                message: 'Error while creating the new activity',
                error: err
            })
        } else {
            var activity = new Activity();
            activity.id = activities.length ? activities[activities.length - 1].id + 1 : 1;
            activity.title = req.body.title;
            activity.short_descripcion = req.body.short_description;
            activity.long_description = req.body.long_description;
            activity.tags = req.body.tags ? req.body.tags : [];  // TODO: Validar la existencia de la tag
            activity.coordinates = req.body.coordinates ? req.body.coordinates : [];
        
            activity.save(function (err) {
                if (err) {
                    res.json({
                        code: 500,
                        message: 'Error while saving the new activity',
                        error: err
                    });
                } else {
                    res.json({
                        code: 200,
                        message: 'New activity created!',
                        data: activity
                    });
                }
            });
        }
    });
};

exports.view = function (req, res) {
    Activity.findOne({'id': req.params.id}, function (err, activity) {
        if (err) {
            res.send({
                code: 500,
                message: "An error ocurred getting the activity!",
                error: err
            });
        }

        if (activity) {
            res.json({
                code: 200,
                message: 'Activity found!',
                data: activity
            });
        } else {
            res.json({
                code: 400,
                message: 'Activity not found!',
                data: {
                    id: req.params.id
                }
            });
        }
    });
};

exports.update = function (req, res) {
    Activity.findOne({"id": req.body.id}, function (err, activity) {
        if (err)
            res.send(err);

        if (activity) {
            if (activity.updateData(req.body)) {
                res.json({
                    code: 200,
                    message: 'Activity info updated!',
                    data: activity
                });
            } else {
                res.json({
                    code: 500,
                    message: "Error while saving the activity",
                    error: err
                });
            }
        } else {
            res.json({
                code: 400,
                message: "Activity not found!",
                data: req
            })
        }
    });
};

exports.delete = function (req, res) {
    Activity.remove({"id": req.params.id}, function (err, activity) {
        if (err) {
            res.send({
                code: 500,
                message: "There was an error deleteing the activity",
                error: err
            });
        } else {
            res.json({
                code: 200,
                status: "success",
                message: 'Activity deleted'
            });
        }
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

exports.test = function (req, res) {
    Activity.get(function(err, activities) {
        if (err) {
            res.json({
                code: 500
            })
        } else {
            res.json({
                data: activities[activities.length - 1]
            })
        }
    });
};