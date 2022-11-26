
    function get(url, data = {}) {
        console.log($.param(data));
        let res = null;
        $.ajax({
            async: false,
            type: 'GET',
            url: `${url}?${$.param(data)}`,
        }).done(function (data) {
            res = data;
        })
        return res;
    }

    function post(url, data = null) {
        let res = false;
        $.ajax({
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            async: false,
            type: 'POST',
            url: url,
            data: JSON.stringify(data),
        }).done(function (data) {
            res = data;
        })
        return res;
    }
