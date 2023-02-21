@extends('layout.bewertung_layout')

<div class="formular">
    <form method="get" action="/bewertungspeicherung" >
        <fieldset>
            <legend>Bewertung</legend>
            @if($gerichtid!=-1)
                <input type="hidden" name="gericht_id" value="{{$gerichtid}}">
                <label for="gericht_name"> Gericht: {{$gericht['name']}}</label><br>
                @if($gericht['bildname'] == NULL)
                    <img src ="../img/gerichte/00_image_missing.jpg" width="200" height="200">
                @else
                    <img src ="../img/gerichte/{{$gericht['bildname']}}" width="200" height="200">
                @endif
            @else
                <label for="gericht_id">gericht id</label><br>
                <input type="text" name="gericht_id" id="gericht_id"><br>
            @endif
            <br>
            <label for="bemerkung"> Bemerkung</label><br>
            <textarea rows="10" cols="80" name="bemerkung" id="bemerkung"></textarea>
            <input type="hidden" name="benutzer_id" value="{{$id}}">
            <label for="sterne_bewertung">sterne_bewertung</label>
            <select name="sterne_bewertung">
                <option value="sehr gut">★★★★</option>
                <option value="gut">★★★</option>
                <option value="schlecht">★★</option>
                <option value="sehr schlecht">★</option>
            </select>

            <br>
            <input type="submit" value="bewertungen">

        </fieldset>
    </form>
</div>



