<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" charset="UTF-8">
$(document).ready(function(){
  datatable_societe();
  datatable_participant();
});

// GERER SOCIETE
function datatable_societe(){
        $('#list-societe').DataTable({
            // "aLengthMenu": [[50, 100, 200, -1], [50, 100,200,{!!  trans('datatable.all')!!}]],
            // "iDisplayLength": 100,
            // "language":  {!!json_decode(json_encode(trans('datatable.datatable_translate')))  !!} ,
            ajax:{
                "url": "{{route('societes.tous.societe')}}",
                "type": "GET",
                "data":{ _token: "{{csrf_token()}}"}
            },
            columns: [
                {data: 'name'},
                {data: 'action'}
            ]


        });
        $('#list-societe').each(function(){
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Recherche');
            search_input.removeClass('form-control-sm');
            search_input.addClass('border border-dark');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
            length_sel.addClass('border border-dark');
        });
    }
    // Afficher formulaire d'ajout société
   function formAddSociete(){
        $('#modal_add_societe').modal('show');
    }

    // Ajouter une société
    function addSociete(){
        var nom = $("#nom").val();
        if(nom != ''){
            $.ajax({
                dataType: 'json',
                type:'GET',
                url: "{{route('societes.add_societe')}}",
                data:{
                    nom:nom
                }
            }).done(function(data){
                // console.log(data.editSociete);
                $.alert({
                    title: 'Insertion societe',
                    content: data.message,
                    type: 'green',
                    typeAnimated: true,
                });
                $("#nom").val('');
                $('#modal_add_societe').modal('hide');
                $('#list-societe').DataTable().ajax.reload();
                
            });
        }else{
         //   alert('Veuiller remplir les champ obligatoire.');
        }
    }

   // Afficher l'info societe dans le modal
   function showEditSociete(idSociete){
        $('#modal_edit_societe').modal('show');
        $.ajax({
            dataType: 'json',
            url: "{{route('societes.edit_societe')}}",
            type:'GET',
            data: {
                idSociete : idSociete
            }
        })
        .done(function(data){
            var societe = data.societe;
            $("#societe-id").val(idSociete);
            $("#nom_modal_societe").val(societe.name);
            $("#nom_modal_societe").trigger('focus');
        });
    }

    // Editer une société
    function editSociete(){
        var nom = $("#nom_modal_societe").val();
        var id = $("#societe-id").val();
        if(nom != ''){
            $.ajax({
                dataType: 'json',
                type:'GET',
                url: "{{route('societes.edit_societe_ajax')}}",
                data:{
                    idSociete: id,
                    nomSociete:nom
                }
            }).done(function(data){
                // console.log(data.editSociete);
                $.alert({
                    title: 'Modification societe',
                    content: data.message,
                    type: 'green',
                    typeAnimated: true,
                });
                $('#modal_edit_societe').modal('hide');
                $('#list-societe').DataTable().ajax.reload();
                
            });
        }else{
         //   alert('Veuiller remplir les champ obligatoire.');
        }
    }

    // Supprimer une société
    function showDeleteSociete(idSociete){
        $('#modal_delete_societe').modal('show');
        $("#id_societe").val(idSociete);
    }

    function deleteSociete(){
        var idSociete = $("#id_societe").val();
        $.ajax({
            dataType: 'json',
            url: "{{route('societes.delete_societe')}}",
            type:'GET',
            data: {
                idSociete : idSociete
            }
        })
        .done(function(data){
            if(data.message == "Suppression effectué avec succès"){
               $.alert({
                    title: 'Suppression societe',
                    content: data.message,
                    type: data.statut,
                    typeAnimated: true,
                });
            }else{
                $.alert({
                    title: 'Attention!',
                    content: data.message,
                    type: data.statut,
                    typeAnimated: true,
                });
            }
            $('#modal_delete_societe').modal('hide');
            $('#list-societe').DataTable().ajax.reload();
        });
        // console.log($idSociete);
    }



    // GERER PARTICIPANT
    function datatable_participant(){
        var table = $('#list-participant').DataTable({
            // "aLengthMenu": [[50, 100, 200, -1], [50, 100,200,{!!  trans('datatable.all')!!}]],
            // "iDisplayLength": 100,
            // "language":  {!!json_decode(json_encode(trans('datatable.datatable_translate')))  !!} ,
            ajax:{
                "url": "{{route('participants.tous.participant')}}",
                "type": "GET",
                "data":{ _token: "{{csrf_token()}}"}
            },
            columns: [
                {data: 'check', name: 'check', orderable: false, searchable: false},
                {data: 'name'},
                {data: 'societe'},
                {data: 'email'},
                {data: 'statut'},
                {data: 'action'}
            ]

        });

        $('#list-participant').each(function(){
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Recherche');
            search_input.removeClass('form-control-sm');
            search_input.addClass('border border-dark');
            // LENGTH - Inline-Form control
            var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
            length_sel.removeClass('form-control-sm');
            length_sel.addClass('border border-dark');
        });

        $('#list-participant tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');
            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }
            e.stopPropagation();
        });

        // Handle click on table cells with checkboxes
        $('#list-participant').on('click', 'tbody td, thead th:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        // Handle click on "Select all" control
        $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
            if(this.checked){
                $('#list-participant tbody input[type="checkbox"]:not(:checked)').trigger('click');
            } else {
                $('#list-participant tbody input[type="checkbox"]:checked').trigger('click');
            }
    
            // Prevent click event from propagating to parent
            e.stopPropagation();
        });
    }

     // Afficher formulaire d'ajout participant
   function formAddParticipant(){
        $('#modal_add_participant').modal('show');
    }

    // Ajouter une société
    function addParticipant(){
        var nom_participant = $("#nom_participant").val();
        var societes = [];
        $.each($("#societe option:selected"), function(){            
            societes.push($(this).val());
        });
        var email = $("#email").val();
        if(nom_participant != ''){
            $.ajax({
                dataType: 'json',
                type:'GET',
                url: "{{route('participants.add_participant')}}",
                data:{
                    nom_participant:nom_participant,
                    societe:societes,
                    email:email,
                }
            }).done(function(data){
                // console.log(data.message);
               $.alert({
                    title: 'Insertion participant',
                    content: data.message,
                    type: data.statut,
                    typeAnimated: true,
                });
               $("#nom_participant").val('');
               $("#societe").val('');
               $("#email").val('');
                $('#modal_add_participant').modal('hide');
                $('#list-participant').DataTable().ajax.reload();
                
            });
        }else{
         //   alert('Veuiller remplir les champ obligatoire.');
        }
    }

   // Afficher l'info participant dans le modal
   function showEditSParticipant(idParticipant){
        $('#modal_edit_participant').modal('show');
        $.ajax({
            dataType: 'json',
            url: "{{route('participants.edit_participant')}}",
            type:'GET',
            data: {
                idParticipant : idParticipant
            }
        })
        .done(function(data){
            var participant = data.participant;
            $("#participant-id").val(idParticipant);
            $("#nom_modal_participant").val(participant.name);
            $("#email_modal_participant").val(participant.email);
            $("#nom_modal_participant").trigger('focus');
        });
    }

    // Editer un participant
    function editParticipant(){
        var nom = $("#nom_modal_participant").val();
        var email = $("#email_modal_participant").val();
        var id = $("#participant-id").val();
        if(nom != ''){
            $.ajax({
                dataType: 'json',
                type:'GET',
                url: "{{route('participants.edit_participant_ajax')}}",
                data:{
                    idParticipant: id,
                    nomParticipant:nom,
                    emailParticipant:email,
                }
            }).done(function(data){
                // console.log(data.editSociete);
                $.alert({
                    title: 'Modification participant',
                    content: data.message,
                    type: 'green',
                    typeAnimated: true,
                });
                $('#modal_edit_participant').modal('hide');
                $('#list-participant').DataTable().ajax.reload();
                
            });
        }else{
         //   alert('Veuiller remplir les champ obligatoire.');
        }
    }

    // Supprimer un participant
    function showDeleteParticipant(idParticipant){
        $('#modal_delete_participant').modal('show');
        $("#id_participant").val(idParticipant);
    }

    function deleteParticipant(){
        var idParticipant = $("#id_participant").val();
        $.ajax({
            dataType: 'json',
            url: "{{route('participants.delete_participant')}}",
            type:'GET',
            data: {
                idParticipant : idParticipant
            }
        })
        .done(function(data){
            $.alert({
                title: 'Suppression participant',
                content: data.message,
                type: 'green',
                typeAnimated: true,
            });
            $('#modal_delete_participant').modal('hide');
            $('#list-participant').DataTable().ajax.reload();
        });
        // console.log($idSociete);
    }

    function deletSelected(){
        var arrayOfValues = [];
        var tableControl= document.getElementById('#list-participant');
        $('input:checkbox:checked', tableControl).each(function() {
            arrayOfValues.push($(this).closest('tr').find('#val-check').val());
        }).get();

        $.ajax({
            dataType: 'json',
            url: "{{route('participants.delete_multiple_participant')}}",
            type:'GET',
            data: {
                arrayOfValues : arrayOfValues
            }
        })
        .done(function(data){
            $.alert({
                title: 'Suppression multiple des participants',
                content: data.message,
                type: 'green',
                typeAnimated: true,
            });
            $('#list-participant').DataTable().ajax.reload();
            // console.log(data.message);
        });
        
    }
</script>