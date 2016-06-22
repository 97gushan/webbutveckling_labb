
<div class="form_container">
    <h1>Skriv kommentar</h1>
    <form id="form">
        <input type="text" id="name" class="name_field" placeholder="Ange namn">
        <input type="text" id="mail" class="name_field" placeholder="Ange mail">

        <textarea id="comment" name="comment" form="form" class="text_field" placeholder="ange kommentar"></textarea>


        <input type="button" value="send" onclick="_send_data.send_data();" class="button">
    </form>
</div>
