var editor;
$(document).ready(function() {
    OPTS = $.extend(true, {
        datatable: {
            config: {
                stateSave: true,
                processing: true,
                order: [[0, "asc"]],
                lengthMenu: [[20, 50, 100, -1], [20, 50, 100, _("All")]],
                // dom: '<"row"<"col-lg-4"B><"col-lg-4 text-center"r><"col-lg-4"f>>t<"row"<"col-lg-3 text-left"l><"col-lg-6 text-center"p><"col-lg-3 text-right"i>>',
                columnDefs: [
                    {
                        data        : "doc.index",
                        className   : "row-index text-center",
                        targets     : 0
                    },
                    {
                        data: "doc.condition",
                        className: "main-condition",
                        targets: -3,
                        render: function (data, type, row) {
                            return $("<p>").addClass('label label-success label-' + data.id)
                                .text(_(data.name)).wrap("<div>")
                                .parent().html();
                        }
                    },
                    {
                        data: "doc.updated",
                        className: "main-updated",
                        targets     : -2
                    },
                    {
                        data        : "links",
                        className   : "actions text-center",
                        orderable   : false,
                        targets     : -1,
                        render      : function (data, type, row) {
                            return $("<div>").css('width', "100px").append(
                                $("<a>").addClass('btn btn-sm btn-info').attr('href', (data ? data.edit : "#"))
                                    .append($("<i>").addClass("fa fa-edit")),
                                $("<a>").addClass('btn btn-sm btn-danger').attr('href', (data ? data.drop : "#"))
                                    .append($("<i>").addClass("fa fa-trash-o"))
                            ).wrap("<div>").parent().html();
                        }
                    }
                ],
                rowReorder: {
                    dataSrc: "doc.index",
                    selector: "td.row-index",
                    editor: editor,
                    update: true,
                    snapX: true
                },
                language: {
                    infoFiltered: "",
                    zeroRecords: "Nothing found - sorry",
                    info: "Showing _START_ to _END_ of _TOTAL_",
                    lengthMenu: "Show _MENU_ entries",
                    infoEmpty: ""
                },
                select: {
                    style: 'multi',
                    selector: '.select-box'
                },
                buttons: []
            }
        }
    }, window.OPTS);

    /* ---------- Datable ---------- */
    var dt = $( ".datatable" ).DataTable(OPTS.datatable.config);
    dt.on('row-reorder', function (e, changes, data) {
        if (!$.isEmptyObject(data.values)) {
            $.post(OPTS.sort.link, data.values);
        }
    });

    // Init sorting after datatable
    dt.on('init', function () {});

    // Processing event handler
    dt.on('processing.dt', function (e, settings, processing) {
        $('.dataTables_processing', $(this))
            .fadeTo(Number(processing));
    });

    // Draw event handler
    dt.on('draw.dt', function(e, options) {
        console.info(e, options);
        var checkboxes = $('.select-box');
        checkboxes.iCheck({
            checkboxClass: 'icheckbox_flat-green',
            handle: 'checkbox'
        });

        checkboxes.on('ifChanged', function (e) {
            // var row = dt.row( $(e.target).closest('tr') );
            // e.target.checked ? row.select() : row.deselect();
        });
    });

    dt.on('order.dt search.dt', function () {
        dt.column(0, { search: 'applied', order: 'applied' }).nodes()
            .each(function(cell, i) {
                $(cell).empty().append(
                    $("<span>").addClass('idx').text(i+1),
                    $("<a>").addClass('btn btn-sm hidden').append(
                        $("<i>").addClass("fa fa-sort")
                    )
                );
            });
    }).draw();

    dt.on('select', function (e, dt, type, indexes) {
        if (dt.rows({ selected: true }).count()) {
            $('.dt-buttons .hidden').removeClass('hidden')
        }
    });

    dt.on('deselect', function (e, dt, type, indexes) {
        if (dt.rows({ selected: true }).count() == 0) {
            $('.buttons-edit, .buttons-remove', $('.dt-buttons'))
                .addClass('hidden');
        }
    });

    if (OPTS.datatable.config.rowReorder !== null) {
        dt.on('hover', 'tr', function (e) {
            $('td.row-index > *', e.currentTarget)
                .toggleClass('hidden');
        });
    }
});