$("#category_subform").submit(function (e) {
    e.preventDefault();

    var form = $("#category_subform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/category";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                console.log(data.status);
                toastr.success("Category Added Successfully!", "success");
                $("#add_category").modal("hide");
                $("#category_subform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});

$(document).on("click", ".category_id", function () {
    var id = $(this).data("category_id");
    var edit_url =
        $('meta[name="base_url"]').attr("content") +
        "/category/" +
        id +
        "/edit";
    $.ajax({
        url: edit_url,
        method: "GET",
        data: { id: id },
        contentType: false,
        processData: false,
        success: function (res) {
            $("#edit_category_name").val(res.data.category_name);
            $("#category-id").val(res.data.id);
        },
    });
});

$("#category_editform").submit(function (e) {
    e.preventDefault();
    var form = $("#category_editform")[0];
    var id = $("#category-id").val();
    var redirect = $('meta[name="base_url"]').attr("content") + "/category";
    var update = $('meta[name="base_url"]').attr("content") + "/category/" + id;
    var formData = new FormData(form);
    $.ajax({
        url: update,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                console.log(data);
                toastr.success("Category Updated Successfully!", "success");
                $("#edit_category").modal("hide");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});
$("#m_category_subform").submit(function (e) {
    e.preventDefault();

    var form = $("#m_category_subform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/category";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                console.log(data.status);
                toastr.success("Category Added Successfully!", "success");
                $("#m_add_category").modal("hide");
                $("#m_category_subform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});

$(document).on("click", ".m_category_id", function () {
    var id = $(this).data("category_id");
    var edit_url =
        $('meta[name="base_url"]').attr("content") +
        "/category/" +
        id +
        "/edit";
    $.ajax({
        url: edit_url,
        method: "GET",
        data: { id: id },
        contentType: false,
        processData: false,
        success: function (res) {
            $("#m_edit_category_name").val(res.data.category_name);
            $("#m_category-id").val(res.data.id);
        },
    });
});

$("#m_category_editform").submit(function (e) {
    e.preventDefault();
    var form = $("#m_category_editform")[0];
    var id = $("#m_category-id").val();
    var redirect = $('meta[name="base_url"]').attr("content") + "/m_category";
    var update = $('meta[name="base_url"]').attr("content") + "/m_category/" + id;
    var formData = new FormData(form);
    $.ajax({
        url: update,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                console.log(data);
                toastr.success("Category Updated Successfully!", "success");
                $("#m_edit_category").modal("hide");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});

//gallery add form
$("#gallery_addform").submit(function (e) {
    e.preventDefault();

    var form = $("#gallery_addform")[0];
    var url = $("#url").val();
    var redirect = $('meta[name="base_url"]').attr("content") + "/gallery";
    var formData = new FormData(form);
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Gallery Added Successfully!", "success");
                $("#gallery_addform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});
//gallery edit form
$("#gallery_editform").submit(function (e) {
    e.preventDefault();
    var form = $("#gallery_editform")[0];
    var id = $("#gallery_id").val();
    var edit_url = $('meta[name="base_url"]').attr("content") + "/gallery/" + id;
    var redirect = $('meta[name="base_url"]').attr("content") + "/gallery";
    var formData = new FormData(form);
    $.ajax({
        url: edit_url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Gallery Updated Successfully!", "success");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});



//gallery add form
$("#m_gallery_addform").submit(function (e) {
    e.preventDefault();

    var form = $("#m_gallery_addform")[0];
    var url = $("#url").val();
    var redirect = $('meta[name="base_url"]').attr("content") + "/m_gallery";
    var formData = new FormData(form);
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Gallery Added Successfully!", "success");
                $("#m_gallery_addform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});
//gallery edit form
$("#gallery_editform").submit(function (e) {
    e.preventDefault();
    var form = $("#gallery_editform")[0];
    var id = $("#gallery_id").val();
    var edit_url = $('meta[name="base_url"]').attr("content") + "/gallery/" + id;
    var redirect = $('meta[name="base_url"]').attr("content") + "/gallery";
    var formData = new FormData(form);
    $.ajax({
        url: edit_url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Gallery Updated Successfully!", "success");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".err").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="err text-danger">' + value + "</div>"
                );
            });
        },
    });
});
// add event form
$("#event_addform").submit(function (e) {
    e.preventDefault();
    var form = $("#event_addform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/news-event";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("News & Event Added Successfully!", "success");
                $("#event_addform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});
// edit event form
$("#event_editform").submit(function (e) {
    e.preventDefault();
    var form = $("#event_editform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/news-event";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("News & Event Updated Successfully!", "success");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});
//event images
$("#event_image_addform").submit(function (e) {
    e.preventDefault();
    var form = $("#event_image_addform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/event-image";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Event Image Added Successfully!", "success");
                $("#event_image_addform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});

$("#event_image_editform").submit(function (e) {
    e.preventDefault();
    var eventimage_id = $("#eventimage_id").val();
    var form = $("#event_image_editform")[0];
    var formData = new FormData(form);
    var url = $('meta[name="base_url"]').attr("content") + "/event-image/"+eventimage_id;
    var redirect = $('meta[name="base_url"]').attr("content") + "/event-image";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Event Image Updated Successfully!", "success");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});

//Highlight
$("#Highlight_addform").submit(function (e) {
    e.preventDefault();
    var form = $("#Highlight_addform")[0];
    var url = $("#url").val();
    var formData = new FormData(form);
    var redirect = $('meta[name="base_url"]').attr("content") + "/highlights";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Highlight Added Successfully!", "success");
                $("#Highlight_addform")[0].reset();
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});

$("#Highlight_editform").submit(function (e) {
    e.preventDefault();
    var id = $("#highlight_edit_id").val();
    var form = $("#Highlight_editform")[0];
    var formData = new FormData(form);
    var url = $('meta[name="base_url"]').attr("content") + "/highlight/"+id;
   var redirect = $('meta[name="base_url"]').attr("content") + "/highlights";
    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == true) {
                toastr.success("Highlight Updated Successfully!", "success");
                setTimeout(function () {
                    window.location.href = redirect;
                }, 2000);
            }
        },
        error: function (xhr) {
            $(".errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("." + key).append(
                    '<div class="errors text-danger">' + value + "</div>"
                );
            });
        },
    });
});