## graphify

This project has a knowledge graph at graphify-out/ with god nodes, community structure, and cross-file relationships.

Rules:
- When graphify-out/graph.json exists, run `graphify query "<question>"` before your first grep, search or source-file read for a codebase question, and put this rule in every subagent prompt that explores code. Read raw files only for lines the graph or an earlier read already located. Use `graphify path "<A>" "<B>"` for relationships and `graphify explain "<concept>"` for focused concepts. When the answer is under a Markdown heading, `graphify section "<heading>"` prints that section's text, so the .md need not be opened. These return a scoped subgraph, usually much smaller than GRAPH_REPORT.md or raw grep output.
- If graphify-out/wiki/index.md exists, use it for broad navigation instead of raw source browsing.
- Read graphify-out/GRAPH_REPORT.md only for broad architecture review or when query/path/explain do not surface enough context.
- After modifying code, run `graphify update .` to keep the graph current (AST-only, no API cost).
- A committed graphify-out/graph.json is rewritten whole on every build, so a large diff to it in a pull request is expected. Do not flag it as churn or suggest skipping the graph rebuild or its hooks.

## Memoria de Tovel (obligatorio en cada sesión)

Este proyecto es parte de **Tovel**, la empresa de Andersson Toapanta Vélez ("Desarrollado por A.T."). Claude no recuerda entre conversaciones: la memoria está en la Mac, en `Documentos/Tovel/`.

- Carpeta de este proyecto: `Documentos/Tovel/02 Proyectos/09 Gestión de aulas/` (código en `código/`).
- Memoria (bóveda de Obsidian): `Documentos/Tovel/03 Memoria (Obsidian)/`. Empieza por `00 Empieza aquí.md`; historial de este proyecto en `historial/09 Gestión de aulas.md`.

Antes de trabajar, lee la ficha y el historial del proyecto si tienes acceso. Al terminar cualquier cambio:
1. Anótalo en `bitacora/AAAA-MM-DD.md` (créala si no existe) con enlace a la ficha del proyecto.
2. Actualiza la ficha en `proyectos/` si cambia el estado, la versión, una ubicación o una decisión.
3. Agrega la fecha y lo hecho a `historial/09 Gestión de aulas.md` y una línea a `Historial general.md`.
4. Sube el código a GitHub y refleja el cambio en el sitio de Tovel y en El desarrollador si corresponde.

Si no puedes escribir en la Mac, entrega al usuario las notas listas para copiar en esas rutas.
