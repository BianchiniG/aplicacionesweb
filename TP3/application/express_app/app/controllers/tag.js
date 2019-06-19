Tag = require('../models/tag');

exports.index = function (req, res) {
    Tag.get(function (err, tags) {
        if (err) {
            res.json({
                status: "error",
                message: err,
            });
        }
        res.json({
            status: "success",
            message: "Tags retrieved successfully",
            data: tags
        });
    });
};

exports.new = function (req, res) {
    var tag = new Tag();
    tag.name = req.body.name;

    tag.save(function (err) {
        res.json({
            message: 'New tag created!',
            data: tag
        });
    });
};

exports.view = function (req, res) {
    Tag.findById(req.params.tag_id, function (err, tag) {
        if (err)
            res.send(err);
        res.json({
            message: 'Tag details loading..',
            data: tag
        });
    });
};

exports.update = function (req, res) {
    Tag.findById(req.params.tag_id, function (err, tag) {
        if (err)
            res.send(err);
        tag.name = req.body.name;

        tag.save(function (err) {
            if (err)
                res.json(err);
            res.json({
                message: 'tag Info updated',
                data: tag
            });
        });
    });
};

exports.delete = function (req, res) {
    Tag.remove({
        _id: req.params.tag_id
    }, function (err, tag) {
        if (err)
            res.send(err);
        res.json({
            status: "success",
            message: 'Tag deleted'
        });
    });
};

exports.getByName = function (req, res) {
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
