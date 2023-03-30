# Password generator API (Homework)
Decently secure password generator (32 char length)


# Arguments
| arg | desc |
| --- | --- |
| operation | api operation ('newpass' only) |
| output | output mode ('xml', 'json') |

# Example usage:
```
http://localhost/school/bubilek/PasswordGen-API/newpass/json
```

An output is going to be in either json or XML:
```
<nodes>
<report>OK</report>
    <data>
        <operation>newpass</operation>
        <output>xml</output>
        <password>TCaHCT0bOXMbRm7k3IQNpXbJEirrdA59y</password>
    </data>
</nodes>
```

## INSTALLATION
1. Download the source code
2. Host it/use xampp etc.
3. Change the path in .htaccess
4. Refer to example usage above

## Prerequisites
- Tested on PHP8 & xampp