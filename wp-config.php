<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ';~:O7%A>@D.#xW1[O8rSM`fgHs`jD1f|u3?E+|r!N1p.HzX:XkGMFHQO{0c] #jz' );
define( 'SECURE_AUTH_KEY',  'd!p^74Y2(uXgOk3.?O_.7wN?<D?NH_Os-H&Lt;ba;ba^X,z0+>rmo6!d.ms.Mv#J' );
define( 'LOGGED_IN_KEY',    'fCz)>2lS[lPCDvh4#vY}frR>>[<))2N~NkzAeQTLDKR2MF1eM1>x6Ok8]KIzp .q' );
define( 'NONCE_KEY',        'rR0k#;%V`%^H^kqmo4kiO_: rCsEz{Ixk!/W$fxrm+Oh]pljE-{gLU_a*>+@*K&g' );
define( 'AUTH_SALT',        'VfxRZapCPLyr3[&@g@<_`aLoD^Nro3g/tuwzO#wj{wa1<4Z</ HH+]wd{e>e-v3N' );
define( 'SECURE_AUTH_SALT', '=y_(8vh|TmKqvjfH%.*gRc,<-O5/DseJ}OfztH7UDp>Zu^7{qb ;k)V+<b;vnEE.' );
define( 'LOGGED_IN_SALT',   '{Dk<14Gh-!7q=4+VHR6T>|-i++] 3^M$C_7I69i4O/ +CMxiP[<KMztyc X<#Gm=' );
define( 'NONCE_SALT',       ';){|Yfi1!d3txaowAQ8Rk!22uc/Bj(Si%}k!Q4~``Z{|.Aog@@/.XO8/F%3.XKrT' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
