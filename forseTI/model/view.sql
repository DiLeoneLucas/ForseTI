CREATE VIEW v_usuario AS
SELECT
	u.id_user,
    u.nome,
    u.sobrenome,
    u.ramal,
    u.email,
    s.stats as status,
    t.tipo as tipo
FROM usuario u
JOIN status s on u.id_status = s.id_status
JOIN tipo t on u.id_tipo = t.id_tipo;

CREATE OR REPLACE VIEW v_ficha AS
SELECT 
    f.id_ficha,
    tf.tipo_ficha AS tipo,
    s.stats as stats,
    f.categoria as categoria
FROM ficha f
LEFT JOIN tipo_ficha tf ON f.tipo = tf.id_tipo_ficha
LEFT JOIN status s ON f.status_ficha = s.id_status;
