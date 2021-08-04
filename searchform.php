

<form class=""action="<?= esc_url(home_url('/')) ?>">
    <input class="" name="s" type="search" placeholder="Recherche" aria-label="Search" value="<?= get_search_query()?>">
    <button color="white" class="" type="submit">Rechercher</button>
</form>