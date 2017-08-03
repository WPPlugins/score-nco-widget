

=== Score n'co Widget ===
Contributors: scorenco
Tags: scorenco, sports, widget, informations, classements, matchs
Requires at least: 3.1
Tested up to: 4.7.0
Stable tag: 1.2.0
License: GPLv2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html

Ajoutez facilement les widgets sportifs que vous créez sur Score n'co, grâce à cette extension ultra-simple.

== Description ==
L'ajout de widgets Score n'co à votre site Wordpress n'a jamais été aussi simple !

Avec Score n'co, vous pouvez créer des widgets sportifs qui affichent facilement les matchs, résultats, classements et calendriers de vos équipes et compétitions préférées.

Créez votre widget sportif sur votre espace d'administration Score n'co ([scorenco.com/admin](https://scorenco.com/admin/widgets/?wordpress=1)), puis intégrez-le en une poignée de minutes sur votre site Wordpress.

= Totalement automatique =
Tous les widgets Score n'co **se mettent à jour automatiquement**. Ils affichent toujours les derniers matchs, classements et résultats, sans intervention de votre part. Une fois installés, vous n'avez plus à vous en préoccuper !

= Fonctionnement =
Cette extension insère une **iframe** pointant vers une page de Score n'co, qui génère le contenu de votre widget sportif.
La page se présente sous une URL du type **scorenco.com/widget/ID_DU_WIDGET/**, et chargera les fichiers HTML, CSS et JS nécessaires à l'affichage du widget.

Notez que cette extension fait des appels vers les serveurs Score n'co, afin de transmettre et récupérer les informations liées à vos widgets (configuration des widgets, données sportives). Certains widgets se mettent également à jour sans rafraîchir la page, toutes les minutes environ.

== Installation ==
1. Commencez par installer et activer l'extension.
1. Après avoir installé l'extension, il vous suffit de vous rendre dans la section Widgets de l'administration Wordpress.
1. L'élément **Score n'co Widget** vous permettra d'intégrer directement les widgets dans les zones de votre thème.

Vous avez simplement à renseigner l'identifiant de votre widget Score n'co, que vous pouvez trouver au même endroit que les codes d'intégration. Renseignez une hauteur si vous souhaitez que le widget ait une taille fixe.
Si la hauteur n'est pas renseignée, le widget se redimensionne automatiquement en fonction de son contenu.

NOTE :
Si vous n'avez pas encore créé un widget sur l'interface Score n'co, vous pouvez le faire facilement sur [scorenco.com/admin](https://scorenco.com/admin/widgets/?wordpress=1)


== Frequently Asked Questions ==
= Que dois-je inscrire dans le champ Identifiant du widget ? =

– Il s'agit d'un code unique qui permet de définir quel widget sportif sera affiché à cet emplacement. Vous pouvez trouver cet identifiant sur la page d'édition du widget, dans votre espace d'administration Score n'co.

= Comment faire pour que mon widget ait automatiquement la bonne hauteur ? =

– Afin que votre widget se redimensionne en fonction de son contenu, il vous suffit de laisser le champ “hauteur” vide.

== Changelog ==
= v1.2.0 =

Correction d'un bug qui pouvait apparaître avec d'anciennes versions de PHP.
Mise à jour du resizer.

= v1.1.0 =

Correction de cas où les widgets n'apparaissaient pas sur des pages sécurisées par https.

= v1.0.1 =

Ajout d'un lien vers l'espace d'administration Score n'co dans le widget.
Ajouts à la description de l'extension.

= v1.0 =

Le nouveau widget Wordpress Score n'co est désormais disponible.

