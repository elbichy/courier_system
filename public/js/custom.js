$(document).ready(function() {

    //////////////////////////////////// MATERIALIZE & PLUGINS INITS //////////////////////////////////////////
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.tooltipped').tooltip();
    $('.modal').modal({
        dismissible: true
    });



    $('.materialboxed').materialbox();
    $('select').formSelect();
    $('#selectBranch').formSelect();
    $('.nav-wrapper .dropdown-content li').click(function(e) {
        $('form.switchBranch').submit();
    });
    $('.timepicker').timepicker({
        defaultTime: '9:00',
        showClearBtn: true
    });
    $('.tabs').tabs({
        swipeable: false
    });
    $('.dropdown-trigger').dropdown();


    // STATIC NAVIGATIONS
    $('#home').click(function() {
        $('html, body').animate({
            scrollTop: $('.header').offset().top
        }, 1000, 'easeOutBack');
    });
    $('#howtoapply').click(function() {
        $('html, body').animate({
            scrollTop: $('#instruction').offset().top
        }, 1000, 'easeOutBack');
    });
    $('#signinlink').click(function() {
        $('html, body').animate({
            scrollTop: $('#formArea').offset().top
        }, 1000, 'easeOutBack');
    });
    $('#howtoapplyBtn').click(function() {
        $('html, body').animate({
            scrollTop: $('#instruction').offset().top
        }, 1000, 'easeOutBack');
    });
    $('#signinlinkBtn').click(function() {
        $('html, body').animate({
            scrollTop: $('#formArea').offset().top
        }, 1000, 'easeOutBack');
    });


    $('.newInfo > button').click(function() {
        $('.existingWrap').hide('fade', function() {
            $('.existingContainer').css({
                'background': 'linear-gradient(45deg, #164f6b 10%, #039be5 90%)'
            })
            $('.existingInfoWrap').show('fade', function() {
                // This is where i reveal reg form
                $('.newInfoWrap').hide('fade', function() {
                    $('.newContainer').css({
                        'background-image': 'none',
                        'background': 'white'
                    })
                    $('.newWrap').show('fade')
                })
            })
        })
    });

    $('.existingInfo > button').click(function() {
        $('.newWrap').hide('fade', function() {
            $('.newContainer').css({
                'background': 'linear-gradient(45deg, #164f6b 10%, #039be5 90%)'
            })
            $('.newInfoWrap').show('fade', function() {
                // This is where i reveal reg form
                $('.existingInfoWrap').hide('fade', function() {
                    $('.existingContainer').css({
                        'background-image': 'none',
                        'background': 'white'
                    })
                    $('.existingWrap').show('fade')
                })
            })
        })
    });

    $('#register_form').submit(function() {
        $('#regButt').fadeOut(function() {
            $('.preloader-wrapper').fadeIn();
        });

    });

    $('#signin_form').submit(function() {
        $('#loginButt').prop('disabled', true);
        $('.progress').fadeIn();
    });

    $('#resetForm').submit(function() {
        $('.resetBtn').prop('disabled', true);
        $('.progress').fadeIn();
    });

    // GET RANKS IN A CADRE
    $('#cadre').change(function() {
        let cadreSelected = $(this).val();
        axios.get(`${base_url}/api/v1/get-ranks/${cadreSelected}`)
            .then(function(response) {
                // console.log(response.data);
                let ranks = response.data;
                $('#rank').html('<option value="" disabled selected>Choose your option</option>');
                ranks.map(function(rank) {
                    $(`
                        <option value="${rank.id}">${rank.name}</option>
                    `).appendTo('#rank');
                })
            })
            .catch(function(error) {
                // handle error
                console.log(error.data);
            })
            .finally(function() {
                // always executed
            });
    });

    $('.proceedBtn').click(function() {
        $(this).hide('fade');
    })



    // ADD NEW NEXT OF KIN RECORD ASYNC
    $('#nextofkinForm').submit(function(e) {
        e.preventDefault();
        $('.dummyRow > td').html(`
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        `);
        let formData = $(this).serialize();
        let url = `${base_url}applicant/next-of-kin-data/store`;
        console.log(formData);
        console.log(url);
        axios.post(url, formData)
            .then(function(response) {
                $('.dummyRow').fadeOut();
                // console.log(response.data);
                $('#nextofkinForm')[0].reset();
                response.data.count == 2 ? $('.nokProceed').removeAttr('disabled') : '';
                $(`
                    <tr>
                        <td>${ response.data.data.nokfn.charAt(0).toUpperCase() + response.data.data.nokfn.slice(1) }</td>
                        <td>${ response.data.data.nokg.charAt(0).toUpperCase() + response.data.data.nokg.slice(1) }</td>
                        <td>${ response.data.data.nokr.charAt(0).toUpperCase() + response.data.data.nokr.slice(1) }</td>
                        <td>${ response.data.data.noka.charAt(0).toUpperCase() + response.data.data.noka.slice(1) }</td>
                        <td>${ response.data.data.nokp }</td>
                        <td>
                            <a id="deleteRow" onclick="deleteNextofkin(event)" href="#" data-row_id="${ response.data.data.id }" class="red-text">x</a>
                        </td>
                    </tr>
                `).appendTo('.nokTableBody');
                $.wnoty({
                    type: 'success',
                    message: response.data.success,
                    autohideDelay: 5000
                });

            })
            .catch(function(error) {
                $('.dummyRow > td').html(`No data`);
                let values = Object.values(error.response.data.errors);
                let errors = "<b>Errors</b></br>";
                values.forEach(function(error) {
                    errors += `${error[0]} <b>#</b>`
                })
                $.wnoty({
                    type: 'error',
                    message: errors,
                    autohideDelay: 20000
                });
            })
    })



});