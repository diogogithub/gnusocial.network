/**
 * Returns a random number between 0 (inclusive) and max (exclusive)
 */
function getRandom(max) {
    return Math.floor(Math.random() * max);
}

var servers = [ "https://loadaverage.org", "https://gnusocial.cc", "https://gnusocial.no", "https://gnusocial.ch", "https://gnusocial.librelabucm.org", "https://quitter.im", "https://quitter.es" ];
window.location.replace(servers[getRandom(servers.length)]);
