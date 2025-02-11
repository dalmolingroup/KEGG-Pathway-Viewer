# KEGG PATHWAY VIEWER (KPV)

KPV is an advanced online tool designed for the visualization and interactive exploration of KEGG metabolic pathways. It facilitates the dynamic analysis of metabolic networks, enabling users to investigate critical structural properties such as articulation points (APs) within these networks.

## Key Features

The KPV tool introduces innovative features to enhance metabolic pathway analysis:

- **Articulation Point (AP) Detection:** The platform incorporates an AP detection algorithm, enabling the classification and visual identification of key proteins whose removal may disrupt network connectivity.
- **Dynamic Network Visualization:** KPV provides dynamic HTML visualizations of KEGG pathways, allowing users to simulate essential network operations, such as node removal and edge addition, to assess the impact on pathway integrity.
- **Interactive User Interface:** Users can intuitively explore network topology, examine specific node metrics, and identify potential metabolic bottlenecks.

## Accessing KPV

KPV is freely accessible online. To explore the tool, please visit: [KEGG Pathway Viewer](https://dalmolingroup.imd.ufrn.br/kpv).

## Contribution Guidelines

We welcome contributions to enhance KPV. There are several ways you can support the development and improvement of this scientific tool:

### 1. Feedback and Suggestions
Provide feedback, report issues, or suggest new features by [submitting an issue](https://github.com/dalmolingroup/KEGG-Pathway-Viewer/issues).

### 2. Development Contributions
Developers interested in contributing to the project can refer to the [first-contributions guide](./includes/first-contributions/README.md) for more details.

## Contributors

We extend our gratitude to the individuals who have contributed to the development and improvement of KPV:

### Feedback and Suggestions
- Inácio Medeiros
- Diego Arthur

### Development
- Igor Brandão (igorabrandao@gmail.com)
- Clovis F. Reis (cfreis@ufrn.edu.br)


## Changelog

To update the `CHANGELOG.md`, install the `auto-changelog` extension:

```bash
npm install -g auto-changelog
```

Then run the following command:

```bash
auto-changelog --template keepachangelog
```

## Version Control and Tagging

To create release labels for the project, execute the following commands:

```bash
git tag -a v[x.x.x] -m "version [x.x.x]"
git push origin --tags
```

## File Permissions

When deploying the project to a server, ensure the following file and folder permissions:

- **Folders:** `chmod 755`
  ```bash
  find . -type d -exec chmod 755 {} \;
  ```
- **Files:** `chmod 644`
  ```bash
  find . -type f -exec chmod 644 {} \;
  ```

## License

This project is licensed under the [MIT License](https://mit-license.org/).