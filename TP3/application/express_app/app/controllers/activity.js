Activity = require('../models/activity');
Tag = require('../models/tag');


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
            activity.title = req.body.title;
            activity.short_description = req.body.short_description;
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
    Activity.findOne({'_id': req.params.id}, function (err, activity) {
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
    Activity.findOne({"_id": req.body.id}, function (err, activity) {
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
    Activity.remove({"_id": req.params.id}, function (err, activity) {
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
    Activity.find({"tags": req.params.tag}, function(err, activities) {
        if (err) {
            res.json({
                code: 500,
                message: "There was an error getting the activities",
                error: err
            })
        }

        if (activities.length) {
            res.json({
                code: 200,
                message: "Activities found!",
                data: activities
            });
        } else {
            res.json({
                code: 400,
                message: "There was no activities with that tag",
                data: {
                    tag: req.params.tag
                }
            })
        }
    })
};

exports.getByCoordinates = function (req, res) {
    var coordinates = JSON.parse(req.params.coordinates);
    Activity.find({'coordinates': coordinates}, function(err, activities) {
        if (err) {
            res.json({
                code: 500,
                message: "There was an error while searching the activities",
                data: err
            });
        }

        if (activities.length) {
            res.json({
                code: 200,
                message: "Search was successful!",
                data: activities
            });
        } else {
            res.json({
                code: 400,
                message: "There was no activities found on that coordinates!",
                data: req.params.coordinates
            });
        }
    })
};

exports.getBetweenDates = function (req, res) {
    var parameter = JSON.parse(req.params.dates);
    if (Array.isArray(parameter)) {
        if (parameter.length == 2) {
            Activity.find({date: {$elemMatch: {$gte: parameter[0], $lt: parameter[1]}}}, function (err, activities) {
                if (err) {
                    res.json({
                        code: 500,
                        message: "Error while getting the activities!",
                        data: err
                    });    
                }

                if (activities.length){
                    res.json({
                        code: 200,
                        message: "Activities found!",
                        data: activities
                    });
                } else {
                    res.json({
                        code: 400,
                        message: "No activities were found between those dates",
                        data: parameter
                    })
                }
            })
        } else {
            res.json({
                code: 500,
                message: "The qty of parameters is wrong!",
                data: parameter
            });
        }
    }
};

exports.getByKeyword = function (req, res) {
    var keyword = req.params.keyword;

    Activity.find({'title': { $regex: /^keyword/ }}, function (err, activities) {
        if (err) {
            res.json({
                code: 500,
                message: "There was an error retrieving the activities",
                data: err
            })
        }

        res.json({
            code: 200,
            message: "Activities found!",
            data: activities
        })
    });
};
