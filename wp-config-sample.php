<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_gatling' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'user_bdd' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'password_bdd' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'w#J+]sQaqYpIa%+ZfC/P+2OSXL$[qk%Gbzi6dyxISEq5hVVnX>HgD~$Ie)QoQ5:{' );
define( 'SECURE_AUTH_KEY',  'rxjE;K*E>C ?U(a6NG&akm/Sw5&QGKR_^?6jq*9mjPz| *tjj* zJ*ll3VtgZ$m:' );
define( 'LOGGED_IN_KEY',    '0Gm<~n[*YgUH#s>W$E]Z:=^~J^v01Lov**|;1|/X$nVH+1eg$Oy[}L[Cq|.0dZIf' );
define( 'NONCE_KEY',        '(:tSGN8yehImHn#//)36M2XmkZlmSMgGM,-)71$p6)v|AU<sAd[~|*&X,UQB?0M>' );
define( 'AUTH_SALT',        '#e)N;768@fQ(jRLR0[7bMX/CkT [ha{(U8[~j#fw&&A^U1UG@bO`5rJ`6:/&GHqX' );
define( 'SECURE_AUTH_SALT', 'U(zu!%dENuS*D]D26T],CC#i#$Zb7I{RnxUR9D3)3jhW/42D^#~Fc%jR:Jp;~g1U' );
define( 'LOGGED_IN_SALT',   '|bl~.x<rcR01?y8oS2[m%Ok{%vM}l@)k=%+(]>20|tf+KX9vX@gLcNy#8ILY?`,&' );
define( 'NONCE_SALT',       ')^WSY~X?58b;Un)buE6M>L4_MgQU)z@(Qky4?zBE$#7V_jhz,,rFFrbO3aDvu61_' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

define('FS_METHOD', 'direct');
